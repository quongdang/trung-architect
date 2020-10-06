import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { NgbModal, NgbModalOptions } from '@ng-bootstrap/ng-bootstrap';
import { TranslateService} from '@ngx-translate/core';
import { projectRoutes } from './project.route';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { environment} from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { CategoryService } from '../services/category.service';
import { PopupModalContent } from '../shared/popup/popup-modal.content';

@Component({
  selector: 'app-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.scss']
})
export class ProjectComponent implements OnInit {
  projects: any[] = [];
  category: any;
  baseURL = environment.baseURL;

  constructor(
    private route: ActivatedRoute,
    private router: Router,              
    public translate: TranslateService,
    private projectService: ProjectService,
    private categoryService: CategoryService,
    private modalService: NgbModal) {
  }

  ngOnInit() { 
    this.route.queryParams.subscribe(params => {
      const categoryId = params['category_id'];
      if(categoryId) {
        this.getCategory(categoryId);
        this.getAllProjectsBelongCategory(categoryId);
      }else {
        this.getAllProjects();
      }
    });
  }
  
  sendMeHome() {
      this.router.navigate(['']);
  }

  
  getAllProjects() {
    this.projectService.getAllData().subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const project of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", project.title_vn);
        mapTitle.set("en", project.title_en);
        
        const mapSubTitle = new Map();
        mapSubTitle.set("vn", project.subtitle_vn);
        mapSubTitle.set("en", project.subtitle_en);        
        
        const mapMetadata= new Map();
        mapMetadata.set("vn", project.metadata_vn);
        mapMetadata.set("en", project.metadata_en);

        var projectImages = [];
        for(const image of project.project_images)  {
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
        this.projects.push(data);
      }
    });
  }

  getAllProjectsBelongCategory(categoryId: any) {
    this.projectService.getByCategory(categoryId).subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const project of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", project.title_vn);
        mapTitle.set("en", project.title_en);
        
        const mapSubTitle = new Map();
        mapSubTitle.set("vn", project.subtitle_vn);
        mapSubTitle.set("en", project.subtitle_en);        
        
        const mapMetadata= new Map();
        mapMetadata.set("vn", project.metadata_vn);
        mapMetadata.set("en", project.metadata_en);

        var projectImages = [];
        for(const image of project.project_images)  {
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
        this.projects.push(data);
      }
    });
  }

  getCategory(categoryId: any) {
    this.categoryService.getData(categoryId).subscribe((res: ResponseWrapper) => {
      const data = res.json;
      const mapTitle = new Map();
      mapTitle.set("vn", data.category_vn);
      mapTitle.set("en", data.category_en);

      this.category = {
        id: data.id,
        title: mapTitle
      };
      console.log(this.category);
    });
  }
  
  quickView(index: any) {
    let options: NgbModalOptions = {
      size: 'lg',
      centered: true
    };
    const modalRef = this.modalService.open(PopupModalContent, options);
    modalRef.componentInstance.header = this.projects[index].title.get(this.translate.currentLang);
    modalRef.componentInstance.content = this.projects[index].subTitle.get(this.translate.currentLang);
    modalRef.componentInstance.backgroundImage = this.projects[index].projectImages[0].url;
    modalRef.componentInstance.link = "/project/" + this.projects[index].id;
    modalRef.componentInstance.linkName = "View details";
  }
}
