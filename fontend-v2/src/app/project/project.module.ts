import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { SharedModule } from '../shared/shared.module';
import { RouterModule } from '@angular/router';
import { projectRoutes} from './project.route'
import { ProjectComponent } from './project.component';
import { ProjectDetailsComponent } from './project-details.component';
import { ProjectCategoryComponent} from './project-category.component';

const ENTITY_STATES = [
    ...projectRoutes
];

@NgModule({
    imports: [
        RouterModule.forChild(ENTITY_STATES),
        SharedModule,
    ],
    declarations: [
        ProjectComponent,
        ProjectDetailsComponent,
        ProjectCategoryComponent,
    ],
    entryComponents: [
        ProjectComponent,
        ProjectDetailsComponent,
        ProjectCategoryComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class ProjectModule {}
