import {Component, OnInit} from '@angular/core';
import {trigger, style, transition, animate, keyframes, query, stagger} from '@angular/animations';
import {ProjectService} from '../services/project.service';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';
import {TranslateService} from '@ngx-translate/core';
import {environment} from '../../environments/environment';
import * as $ from 'jquery';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: [
    './home.component.scss',
    './slide-show.component.scss'
  ],
  // providers: [ProjectService]
})
export class HomeComponent implements OnInit {
  projects: any[] = [];
  baseURL = environment.baseURL;

  constructor(
    private projectService: ProjectService,
    private translate: TranslateService,
  ) {
    this.getAllProjects();
  }

  ngOnInit() {
    $.fn.isInViewport = function() {
      var elementTop = $(this).offset().top ? $(this).offset().top : 0;
      var elementBottom = elementTop + $(this).outerHeight();
  
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
  
      return elementBottom > (viewportTop + $(window).height()/2) && elementTop < (viewportBottom - $(window).height()/2);
    };

    $(window).on('resize scroll', function() {
      monitor('.section01');
      monitor('.section02');
      monitor('.other');
    });

    function monitor(name: any) {
      if ($(name).length) {
        if ($(name).isInViewport()) {
          console.log(name + ' in view-port');
          $(name).css("width", "100%");
        } else {
          console.log(name + ' out view-port');
          $(name).css("width", "90%");
        }
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
        console.log(data);
        this.projects.push(data);
      }
    });
  }
}
