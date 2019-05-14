import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { NgbModal, NgbModalOptions } from '@ng-bootstrap/ng-bootstrap';
import { TranslateService} from '@ngx-translate/core';
import { projectRoutes } from './project.route';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { environment} from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { PopupModalContent } from '../shared/popup/popup-modal.content';

@Component({
  selector: 'app-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.scss']
})
export class ProjectComponent implements OnInit {
  projects: any[] = [];
  baseURL = environment.baseURL;

  constructor(
    private route: ActivatedRoute,
    private router: Router,              
    public translate: TranslateService,
    private projectService: ProjectService,
    private modalService: NgbModal) { 
    // this.route.params.subscribe(res => console.log(res.id));
  }

  ngOnInit() {
    this.getAllProjects();
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
        const data = {
          id: project.id,
          title: mapTitle,
          subTitle: mapSubTitle,
          url: this.baseURL + "/" + project.image0,
          images1: "url('" + this.baseURL + "/" + project.image0 + "')",
          images2: "url('" + this.baseURL + "/" + project.image1 + "')",
          images3: "url('" + this.baseURL + "/" + project.image2 + "')",
          images4: "url('" + this.baseURL + "/" + project.image3 + "')"
        };
        this.projects.push(data);
      }
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
    modalRef.componentInstance.backgroundImage = this.projects[index].images1;
    modalRef.componentInstance.link = "/project/" + this.projects[index].id;
    modalRef.componentInstance.linkName = "View details";
  }
}
