import {Component, OnInit} from '@angular/core';
import {trigger, style, transition, animate, keyframes, query, stagger} from '@angular/animations';
import {ProjectService} from '../services/project.service';
import {AboutService} from '../services/about.service';
import {CategoryService} from '../services/category.service';
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
  ]
})
export class HomeComponent implements OnInit {
  projects: any[] = [];
  categories: any[] = [];
  aboutUs: any;
  baseURL = environment.baseURL;

  constructor(
    private projectService: ProjectService,
    private aboutService: AboutService,
    private categoryService: CategoryService,
    public translate: TranslateService,
  ) {
  }

  ngOnInit() {
    this.getAllProjects();
    this.getLatestAbout();
    this.getAllCategories();

    $.fn.isInViewport = function() {
      var elementTop = $(this).offset().top ? $(this).offset().top : 0;
      var elementBottom = elementTop + $(this).outerHeight();
  
      var viewportTop = $(window).scrollTop();
      var viewportBottom = viewportTop + $(window).height();
  
      return elementBottom > (viewportTop + $(window).height()/2) && elementTop < (viewportBottom - $(window).height()/2);
    };

    $(window).on('resize scroll', function() {      
      var scrollBehaviors = document.getElementsByClassName("scrollBehavior");
      for (var i = 0; i < scrollBehaviors.length; i++) {
        monitor(scrollBehaviors[i]);
      }
    });

    function monitor(name: any) {
      if ($(name).length) {
        if ($(name).isInViewport()) {
          $(name).css("width", "100%");
        } else {
          $(name).css("width", "90%");
        }
      }
    }
  }

  /**
   * Get all projects to display 
   */
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
        
        const mapMetadata= new Map();
        mapMetadata.set("vn", project.metadata_vn);
        mapMetadata.set("en", project.metadata_en);

        var projectImages = [];
        for(const image of project.project_images)  {
          const mapDescription = new Map();
          mapDescription.set("vn", image.description_vn);
          mapDescription.set("en", image.description_en);
          const data = {
            id: image.id,
            url: "url('" + this.baseURL + "/" + image.image_link + "')",
            description: mapDescription,
            display: image.display
          }
          projectImages.push(data);
        }

        const data = {
          id: project.id,
          title: mapTitle,
          subTitle: mapSubTitle,
          projectImages: projectImages
        };
        this.projects.push(data);
      }
    });
  }

  getLatestAbout() {
    this.aboutService.getLast().subscribe(
      (res: ResponseWrapper) => {
        const data = res.json;
        const mapTitle = new Map();
        mapTitle.set("vn", data.title_vn);
        mapTitle.set("en", data.title_en);
        
        const mapContent = new Map();
        mapContent.set("vn", data.content_vn);
        mapContent.set("en", data.content_en);

        this.aboutUs = {
          id: data.id,
          title: mapTitle,
          content: mapContent,
        }
      }
    )
  }
  
  getAllCategories() {
    this.categoryService.getAllData().subscribe((res: ResponseWrapper) => {
      const data = res.json;
      for (const category of data.records) {
        const mapTitle = new Map();
        mapTitle.set("vn", category.category_vn);
        mapTitle.set("en", category.category_en);

        const data = {
          id: category.id,
          title: mapTitle
        };
        this.categories.push(data);
      }
    });
  }
}
