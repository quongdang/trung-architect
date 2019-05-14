import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { Router } from '@angular/router';
import { TranslateService} from '@ngx-translate/core';
import { AboutService } from '../services/about.service';
import { environment} from '../../environments/environment';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})
export class AboutComponent implements OnInit {
  baseURL = environment.baseURL;
  aboutUs: any;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private aboutService: AboutService) { 
      this.route.params.subscribe(res => console.log(res.id));
  }

  ngOnInit() {
    this.getLast();
  }
  
  sendMeHome() {
      this.router.navigate(['']);
  }
  
  getLast() {
    this.aboutService.getLast().subscribe((res: ResponseWrapper) => {
      const respData = res.json;
        const mapTitle = new Map();
        mapTitle.set("vn", respData.title_vn);
        mapTitle.set("en", respData.title_en);
        
        const mapContent = new Map();
        mapContent.set("vn", respData.content_vn);
        mapContent.set("en", respData.content_en);
        this.aboutUs = {
          id: respData.id,
          title: mapTitle,
          content: mapContent
        };
      }
    );
  }
}
