import { Component, OnInit } from '@angular/core';
import { trigger,style,transition,animate,keyframes,query,stagger } from '@angular/animations';
import { NgxCarousel, NgxCarouselStore } from 'ngx-carousel';
import { ProjectService } from '../services/project.service';
import { ResponseWrapper } from '../dataModel/responseWrapper.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [ProjectService],
  
  animations: [
	trigger('goals', [
		transition('* => *', [
			query(':enter', style({opacity:0}), {optional: true}),
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
					style({opacity: .5, transform: 'translateY(35px)',  offset: 0.3}),
					style({opacity: 0, transform: 'translateY(-75%)',     offset: 1.0}),
				]))
			]), {optional: true})
		])
	])
  ]
})
export class HomeComponent implements OnInit {
    images: any[];
    carouseImgCount: number = 6;

    public carouselBannerItems: Array<any> = [];
    public carouselBanner: NgxCarousel;

    constructor(
            private projectService: ProjectService,
    ) { }
    
    ngOnInit() {
        this.images = [
                       {
                           title: 'An Inspiring \'Home\' on Campus',
                           subTitle: 'University of British Columbia - AMS Student Nest',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/601WestHastings_SecondaryHero-1000x1600.jpg'
                       }, {
                           title: 'Test 1',
                           subTitle: 'Test 1 sub',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/601WestHastings_Hero-2560x1440.jpg' 
                       }, {
                           title: 'Test 2',
                           subTitle: 'Test 2 sub',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/Arab-Centre_Story1-1920x1350.jpg'
                       }, {
                           title: 'Test 3',
                           subTitle: 'Test 3 sub',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/Arab-Centre_Hero-1920x1500.jpg'
                       }, {
                           title: 'Test 4',
                           subTitle: 'Test 4 sub',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/DSCF3674-edit-1920x1920.jpg'
                       }, {
                           title: 'Test 5',
                           subTitle: 'Test 5 sub https://www.bharchitects.com/wp-content/uploads/2017/02/Greenland-Riverside-Luwan_Story3-1920x1920.jpg',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/Greenland-Riverside-Luwan_Story3-1920x1920.jpg'
                       }, {
                           title: 'Test 6',
                           subTitle: 'Test 6 sub https://www.bharchitects.com/wp-content/uploads/2017/02/Greenland-Riverside-Luwan_Story2-1920x1920.jpg',
                           url: 'https://www.bharchitects.com/wp-content/uploads/2017/02/Greenland-Riverside-Luwan_Story2-1920x1920.jpg'
                       }
                     ];

         this.carouselBanner = {
           grid: { xs: 1, sm: 1, md: 1, lg: 1, all: 0 },
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
         
         this.carouselBannerLoad();
         this.getAllProjects();
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
        if (len < this.carouseImgCount) {
            for (let i = len; i <= this.carouseImgCount; i++) {                
                this.carouselBannerItems.push(this.images[this.images.length - i - 1]);
            }
        }
    }
    
    getAllProjects () {
        this.projectService.getAllProjects().subscribe((res: ResponseWrapper) => {
           const data = res.json;
           console.log(data);
        });
    }
}
