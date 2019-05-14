import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { CommonModule} from '@angular/common';
import { RouterModule } from '@angular/router';
import { projectRoutes} from './project.route'
import { ProjectComponent } from './project.component';
import { ProjectDetailsComponent } from './project-details.component';

const ENTITY_STATES = [
    ...projectRoutes
];

@NgModule({
    imports: [
        RouterModule.forChild(ENTITY_STATES),
        CommonModule,
    ],
    declarations: [
        ProjectComponent,
        ProjectDetailsComponent,
    ],
    entryComponents: [
        ProjectComponent,
        ProjectDetailsComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class ProjectModule {}
