import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router';
import { switchMap } from 'rxjs/operators';
import { TranslateService} from '@ngx-translate/core';
import { projectRoutes } from './project.route';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { environment} from '../../environments/environment';
import { ProjectService } from '../services/project.service';
import { Project} from '../dataModel/project.model';

@Component({
  selector: 'app-project-details',
  templateUrl: './project-details.component.html',
  styleUrls: ['./project-details.component.scss']
})
export class ProjectDetailsComponent implements OnInit {
  projects: any[] = [];
  baseURL = environment.baseURL;
  id: any;
  data: Project = new Project();

  constructor(
    private route: ActivatedRoute,
    private router: Router,              
    public translate: TranslateService,
    private projectService: ProjectService) {
  }
  ngOnInit() {    
    this.route.params.subscribe((res) => {      
      this.id = res.id;
      this.getProject();
    });
  }
  
  sendMeHome() {
      this.router.navigate(['']);
  }

  getProject() {
    this.projectService.getOne(this.id).subscribe((res: ResponseWrapper) => {
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
      this.data = {
        id: project.id,
        title: mapTitle,
        subTitle: mapSubTitle,
        content: mapContent,
        url: this.baseURL + "/" + project.image0,
        images1: "url('" + this.baseURL + "/" + project.image0 + "')",
        images2: "url('" + this.baseURL + "/" + project.image1 + "')",
        images3: "url('" + this.baseURL + "/" + project.image2 + "')",
        images4: "url('" + this.baseURL + "/" + project.image3 + "')"
      }
    });
  }
}
