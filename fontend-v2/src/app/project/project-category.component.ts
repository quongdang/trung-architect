import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ModalOptions, BsModalService } from 'ngx-bootstrap';
import { TranslateService } from '@ngx-translate/core';
import { projectRoutes } from './project.route';
import { ResponseWrapper } from '../dataModel/responseWrapper.model';
import { environment } from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { CategoryService } from '../services/category.service';
import { PopupModalContent } from '../shared/popup/popup-modal.content';
import { Category } from '../dataModel/project.model';

@Component({
  selector: 'app-project',
  templateUrl: './project-category.component.html',
  styleUrls: ['./project.component.scss']
})
export class ProjectCategoryComponent implements OnInit {
  category: Category;
  baseURL = environment.baseURL;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private projectService: ProjectService,
    private categoryService: CategoryService,
    private modalService: BsModalService) {
  }

  ngOnInit() {
    this.route.params.subscribe((res) => {
      this.getCategoryAndProjects(res.id);
    });
  }

  sendMeHome() {
    this.router.navigate(['']);
  }

  getCategoryAndProjects(categoryId: any) {
    this.categoryService.getData(categoryId).subscribe((res: ResponseWrapper) => {
      const data = res.json;
      this.category = new Category();
      this.category.id = data.id;
      this.category.title = new Map();
      this.category.title.set("vn", data.category_vn);
      this.category.title.set("en", data.category_en);
      this.category.projects = [];
      this.projectService.getByCategory(categoryId).subscribe((res: ResponseWrapper) => {
        const data = res.json;
        this.category.id = categoryId;
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
            const data = {
              id: image.id,
              url: "url('" + this.baseURL + "/" + image.image_link + "')",
              description: mapDescription,
              display: image.display
            }
            projectImages.push(data);
          }

          const data = {
            id: project.id,
            title: mapTitle,
            subTitle: mapSubTitle,
            projectImages: projectImages
          };
          this.category.projects.push(data);
        }
      });
    });
  }

  quickView(index: any) {
    let options: ModalOptions = {};
    const initialState = {
      header: this.category.projects[index].title.get(this.translate.currentLang),
      content: this.category.projects[index].subTitle.get(this.translate.currentLang),
      backgroundImage: this.category.projects[index].projectImages[0].url,
      link: "/project/" + this.category.projects[index].id,
      linkName: "View details"
    };
    const modalRef = this.modalService.show(PopupModalContent, Object.assign({}, options, { class: 'modal-dialog-centered', initialState }));
  }
}
