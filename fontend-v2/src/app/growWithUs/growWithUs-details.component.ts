import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { Router } from '@angular/router';
import { TranslateService} from '@ngx-translate/core';
import { GrowWithUsService } from '../services/growWithUs.service';
import { environment} from '../../environments/environment';

@Component({
  selector: 'app-growWithUs-details',
  templateUrl: './growWithUs-details.component.html',
  styleUrls: ['./growWithUs-details.component.scss']
})
export class GrowWithUsDetailsComponent implements OnInit {
  baseURL = environment.baseURL;
  growWithUs: any;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private growWithUsService: GrowWithUsService) { 
  }

  ngOnInit() {
    this.route.params.subscribe(res => {
      this.getOne(res.id)
      console.log(this.growWithUs);
    });
  }
  
  sendMeHome() {
      this.router.navigate(['']);
  }
  
  getOne(id : any) {
    this.growWithUsService.getOne(id).subscribe((res: ResponseWrapper) => {
      const respData = res.json;
        const mapTitle = new Map();
        mapTitle.set("vn", respData.title_vn);
        mapTitle.set("en", respData.title_en);
        
        const mapContent = new Map();
        mapContent.set("vn", respData.content_vn);
        mapContent.set("en", respData.content_en);
        this.growWithUs = {
          id: respData.id,
          title: mapTitle,
          content: mapContent
        };
      }
    );
  }
}
