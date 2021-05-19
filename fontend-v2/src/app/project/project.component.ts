import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ModalOptions, BsModalService } from 'ngx-bootstrap';
import { TranslateService } from '@ngx-translate/core';
import { ResponseWrapper } from '../dataModel/responseWrapper.model';
import { environment } from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { CategoryService } from '../services/category.service';
import { PopupModalContent } from '../shared/popup/popup-modal.content';
import { Category } from '../dataModel/project.model';

@Component({
  selector: 'app-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.scss']
})
export class ProjectComponent implements OnInit {
  category: any;
  baseURL = environment.baseURL;
  categories: Category[] = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private projectService: ProjectService,
    private categoryService: CategoryService,
    private modalService: BsModalService) {
  }

  ngOnInit() {
    this.getAllCategoriesAndProjectBelongs();
  }

  sendMeHome() {
    this.router.navigate(['']);
  }

  getAllCategoriesAndProjectBelongs() {
    this.categoryService.getAllData().subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for(const cat of data.records) {
        this.projectService.getByCategory(cat.id).subscribe((res: ResponseWrapper) => {
          const data = res.json;
          const category = new Category();
          category.id = cat.id;
          category.title = new Map();
          category.title.set("vn", cat.category_vn);
          category.title.set("en", cat.category_en);
          category.projects = [];
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
            category.projects.push(data);
          }          
          this.categories.push(category);
        });
      }
    });
  }

  quickView(catIdx: any, prjIndx: any) {
    let options: ModalOptions = {};
    const initialState = {
      header: this.categories[catIdx].projects[prjIndx].title.get(this.translate.currentLang),
      content: this.categories[catIdx].projects[prjIndx].subTitle.get(this.translate.currentLang),
      backgroundImage: this.categories[catIdx].projects[prjIndx].projectImages[0].url,
      link: "/project/" + this.categories[catIdx].projects[prjIndx].id,
      linkName: "View details"
    };
    const modalRef = this.modalService.show(PopupModalContent, Object.assign({}, options, { class: 'modal-dialog-centered', initialState }));
  }
}
