import {Component, OnInit} from '@angular/core';
import {trigger, style, transition, animate, keyframes, query, stagger} from '@angular/animations';
import {NgxCarousel, NgxCarouselStore} from 'ngx-carousel';
import {ProjectService} from '../services/project.service';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';
import {TranslateService} from '@ngx-translate/core';
import {environment} from '../../environments/environment';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [ProjectService],
  animations: [
    trigger('photosAnimation', [
      transition('* => *', [
        query('img',style({ transform: 'translateX(-100%)'})),
        query('img',
          stagger('600ms', [
            animate('900ms', style({ transform: 'translateX(0)'}))
        ]))
      ])
    ])
  ]
})
export class HomeComponent implements OnInit {
  images: any[] = [];
  carouseImgCount = 6;
  baseURL = environment.baseURL;

  public carouselBannerItems: any[] = [];
  public carouselBanner: NgxCarousel;

  constructor(
    private projectService: ProjectService,
    private translate: TranslateService,
  ) {
    this.getAllProjects();
  }

  ngOnInit() {
    this.carouselBanner = {
      grid: {xs: 1, sm: 1, md: 1, lg: 1, all: 0},
      slide: this.carouseImgCount,
      speed: 400,
      interval: 4000,
      animation: 'lazy',
      point: {
        visible: true,
        pointStyles: `
               .ngxcarouselPoint {
                 list-style-type: none;
                 text-align: center;
                 padding: 12px;
                 margin: 0;
                 white-space: nowrap;
                 overflow: auto;
                 position: absolute;
                 width: 100%;
                 bottom: 20px;
                 left: 0;
                 box-sizing: border-box;
               }
               .ngxcarouselPoint li {
                 display: inline-block;
                 border-radius: 999px;
                 background: rgba(255, 255, 255, 0.55);
                 padding: 5px;
                 margin: 0 3px;
                 transition: .4s ease all;
               }
               .ngxcarouselPoint li.active {
                   background: white;
                   width: 10px;
               }
             `
      },
      load: 1,
      custom: 'banner',
      touch: true,
      loop: true,
      easing: 'cubic-bezier(0, 0, 0.2, 1)'
    };
  }

  /* This will be triggered after carousel viewed */
  afterCarouselViewedFn(data) {
    console.log(data);
  }

  /* It will be triggered on every slide*/
  onmoveFn(data: NgxCarouselStore) {
    console.log(data);
  }

  public carouselBannerLoad() {
    const len = this.carouselBannerItems.length;
    const imgLen = this.images.length;
    if (len < this.carouseImgCount) {
      for (let i = len; i <= this.carouseImgCount; i++) {
        this.carouselBannerItems.push(this.images[imgLen - i - 1]);
      }
    }
  }

  /**
   * Get all projects to display 
   */
  getAllProjects() {
    this.projectService.getAllProjects().subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const project of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", project.title_vn);
        mapTitle.set("en", project.title_en);
        
        const mapSubTitle = new Map();
        mapSubTitle.set("vn", project.subtitle_vn);
        mapSubTitle.set("en", project.subtitle_en);
        const image = {
          id: project.id,
          title: mapTitle,
          subTitle: mapSubTitle,
          url: this.baseURL + "/" + project.image0,
          style: "url(" + this.baseURL + "/" + project.image0 + "')"
        };
        this.images.push(image);
      }
      this.carouselBannerLoad();
    });
  }
}
