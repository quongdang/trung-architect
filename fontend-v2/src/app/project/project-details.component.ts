import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { ModalOptions, BsModalService } from 'ngx-bootstrap';
import { switchMap } from 'rxjs/operators';
import { TranslateService } from '@ngx-translate/core';
import { projectRoutes } from './project.route';
import { ResponseWrapper } from '../dataModel/responseWrapper.model';
import { environment } from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { Project } from '../dataModel/project.model';
import { PopupModalContent } from '../shared/popup/popup-modal.content';
import * as $ from 'jquery';
import { CategoryService } from '../services/category.service';

@Component({
  selector: 'app-project-details',
  templateUrl: './project-details.component.html',
  styleUrls: [
    './project-details.component.scss',
    './project.component.scss'
  ]
})
export class ProjectDetailsComponent implements OnInit {
  baseURL = environment.baseURL;
  data: Project = new Project();
  projects: Project[] = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private projectService: ProjectService,
    private modalService: BsModalService,
    private categoryService: CategoryService) {
  }
  ngOnInit() {
    this.route.params.subscribe((res) => {
      this.getProject(res.id);
    });

    $.fn.isInViewport = function () {
      var elementTop = $(this).offset().top ? $(this).offset().top : 0;
      var elementBottom = elementTop + $(this).outerHeight();

      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();

      return elementBottom > (viewportTop + $(window).height() / 2) && elementTop < (viewportBottom - $(window).height() / 2);
    };

    $(window).on('resize scroll', function () {
      var scrollBehaviors = document.getElementsByClassName("scrollBehavior");
      for (var i = 0; i < scrollBehaviors.length; i++) {
        monitor(scrollBehaviors[i]);
      }
    });

    function monitor(name: any) {
      if ($(name).length) {
        if ($(name).isInViewport()) {
          $(name).css("width", "100%");
        } else {
          $(name).css("width", "90%");
        }
      }
    }
  }

  sendMeHome() {
    this.router.navigate(['']);
  }

  getProject(id: any) {
    this.projectService.getOne(id).subscribe((res: ResponseWrapper) => {
      const project = res.json;
      const mapTitle = new Map();
      mapTitle.set("vn", project.title_vn);
      mapTitle.set("en", project.title_en);

      const mapSubTitle = new Map();
      mapSubTitle.set("vn", project.subtitle_vn);
      mapSubTitle.set("en", project.subtitle_en);

      const mapContent = new Map();
      mapContent.set("vn", project.content_vn);
      mapContent.set("en", project.content_en);

      const mapMetadata = new Map();
      mapMetadata.set("vn", project.metadata_vn);
      mapMetadata.set("en", project.metadata_en);

      var projectImages = [];
      for (const image of project.project_images) {
        const mapDescription = new Map();
        mapDescription.set("vn", image.description_vn);
        mapDescription.set("en", image.description_en);
        const data = {
          id: image.id,
          url: "url('" + this.baseURL + "/" + image.image_link + "')",
          link: this.baseURL + "/" + image.image_link,
          description: mapDescription,
          display: image.display
        }
        projectImages.push(data);
      }

      this.data = {
        id: project.id,
        title: mapTitle,
        subTitle: mapSubTitle,
        content: mapContent,
        metadata_lang: mapMetadata,
        metadata: project.metadata,
        projectImages: projectImages
      };
      this.getOtherProjects(project.category_id, project.id);
      this.categoryService.getData(project.category_id).subscribe((res: ResponseWrapper) => {
        const data = res.json;
        const mapTitle = new Map();
        mapTitle.set("vn", data.category_vn);
        mapTitle.set("en", data.category_en);
  
        this.data.category =  mapTitle;
      });
    });
  }

  getOtherProjects(categoryId, id) {
    this.projectService.getOthers(categoryId, id).subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const project of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", project.title_vn);
        mapTitle.set("en", project.title_en);

        const mapSubTitle = new Map();
        mapSubTitle.set("vn", project.subtitle_vn);
        mapSubTitle.set("en", project.subtitle_en);

        const mapMetadata = new Map();
        mapMetadata.set("vn", project.metadata_vn);
        mapMetadata.set("en", project.metadata_en);

        var projectImages = [];
        for (const image of project.project_images) {
          const mapDescription = new Map();
          mapDescription.set("vn", image.description_vn);
          mapDescription.set("en", image.description_en);
          projectImages.push({
            id: image.id,
            url: "url('" + this.baseURL + "/" + image.image_link + "')",
            description: mapDescription,
            display: image.display
          });
        }
        
        this.projects.push({
          id: project.id,
          title: mapTitle,
          subTitle: mapSubTitle,
          metadata: project.metadata,
          projectImages: projectImages
        });
      }
    });
  }
  quickView(index: any) {
    let options: ModalOptions = {};
    const initialState = {
      header: this.projects[index].title.get(this.translate.currentLang),
      content: this.projects[index].subTitle.get(this.translate.currentLang),
      backgroundImage: this.projects[index].projectImages[0].url,
      link: "/project/" + this.projects[index].id,
      linkName: "View details"
    };
    const modalRef = this.modalService.show(PopupModalContent, Object.assign({}, options, { class: 'modal-dialog-centered', initialState }));
  }
}
