import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ResponseWrapper} from '../dataModel/responseWrapper.model';
import { Router } from '@angular/router';
import { TranslateService} from '@ngx-translate/core';
import { AboutService } from '../services/about.service';
import { LocationService } from '../services/location.service';
import { environment} from '../../environments/environment';

@Component({
  selector: 'app-contact-us',
  templateUrl: './contactUs.component.html',
  styleUrls: ['./contactUs.component.scss']
})
export class ContactUsComponent implements OnInit {
  baseURL = environment.baseURL;
  aboutUs: any;
  locations: any[] = [];

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public translate: TranslateService,
    private aboutService: AboutService,
    private locationService: LocationService) { 
      this.route.params.subscribe(res => console.log(res.id));
  }

  ngOnInit() {
    this.getLast();
    this.getLocation();
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
  

  getLocation() {
    this.locationService.getAllData().subscribe((res: ResponseWrapper) => {
      for (const resLocation of res.json.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", resLocation.title_vn);
        mapTitle.set("en", resLocation.title_en);
        
        const mapContent = new Map();
        mapContent.set("vn", resLocation.content_vn);
        mapContent.set("en", resLocation.content_en);
        this.locations.push({
          id: resLocation.id,
          title: mapTitle,
          content: mapContent
        });
      }
    })
  }
}
