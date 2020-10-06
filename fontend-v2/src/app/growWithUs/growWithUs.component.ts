import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { Router } from '@angular/router';
import { TranslateService} from '@ngx-translate/core';
import { GrowWithUsService } from '../services/growWithUs.service';
import { environment} from '../../environments/environment';

@Component({
  selector: 'app-growWithUs',
  templateUrl: './growWithUs.component.html',
  styleUrls: ['./growWithUs.component.scss']
})
export class GrowWithUsComponent implements OnInit {
  baseURL = environment.baseURL;
  growWithUsDatas: any[] = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private growWithUsService: GrowWithUsService) { 
      this.route.params.subscribe(res => console.log(res.id));
  }

  ngOnInit() {
    this.getAll();
  }
  
  sendMeHome() {
      this.router.navigate(['']);
  }
  
  getAll() {
    this.growWithUsService.getAllData().subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const growWithUs of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", growWithUs.title_vn);
        mapTitle.set("en", growWithUs.title_en);
        
        const mapContent = new Map();
        mapContent.set("vn", growWithUs.content_vn);
        mapContent.set("en", growWithUs.content_en);
        const data = {
          id: growWithUs.id,
          title: mapTitle,
          content: mapContent
        };
        this.growWithUsDatas.push(data);
      }
    });
  }
}
