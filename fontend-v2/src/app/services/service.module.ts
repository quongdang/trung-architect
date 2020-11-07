import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { AboutService } from './about.service';
import { ProjectService } from './project.service';
import { GrowWithUsService } from './growWithUs.service';
import { CategoryService } from './category.service';
import { ProjectImageService } from './projectImage.service';
import { LocationService } from  './location.service';

@NgModule({
    providers: [
        AboutService,
        ProjectService,
        GrowWithUsService,
        CategoryService,
        ProjectImageService,
        LocationService,
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class ServiceModule {}
