import {Component, OnInit} from '@angular/core';
import {trigger, style, transition, animate, keyframes, query, stagger} from '@angular/animations';
import {NgxCarousel, NgxCarouselStore} from 'ngx-carousel';
import {ProjectService} from '../services/project.service';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [ProjectService],

  animations: [
    trigger('goals', [
      transition('* => *', [
        query(':enter', style({opacity: 0}), {optional: true}),
        query(':enter', stagger('300ms', [
          animate('.6s ease-in', keyframes([
            style({opacity: 0, transform: 'translateY(-75%)', offset: 0}),
            style({opacity: .5, transform: 'translateY(35px)', offset: 0.3}),
            style({opacity: 1, transform: 'translateY(0)', offset: 1.0}),
          ]))
        ]), {optional: true}),
        query(':leave', stagger('300ms', [
          animate('.6s ease-out', keyframes([
            style({opacity: 1, transform: 'translateY(0)', offset: 0}),
            style({opacity: .5, transform: 'translateY(35px)', offset: 0.3}),
            style({opacity: 0, transform: 'translateY(-75%)', offset: 1.0}),
          ]))
        ]), {optional: true})
      ])
    ])
  ]
})
export class HomeComponent implements OnInit {
  images: any[] = [];
  carouseImgCount = 6;

  public carouselBannerItems: any[] = [];
  public carouselBanner: NgxCarousel;

  constructor(
    private projectService: ProjectService,
  ) {
    this.getAllProjects();
  }

  ngOnInit() {
    this.carouselBanner = {
      grid: {xs: 1, sm: 1, md: 1, lg: 1, all: 0},
      slide: this.carouseImgCount,
      speed: 500,
      interval: 5000,
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
        const image = {
          id: project.id,
          title: project.title_vn,
          subTitle: project.subtitle_vn,
          url: "http://localhost/trung-architect/admin/" + project.image
        };
        this.images.push(image);
      }
      this.carouselBannerLoad();
    });
  }
}
