import { Routes } from '@angular/router';
import { ProjectComponent } from  './project.component';
import { ProjectDetailsComponent } from  './project-details.component';

export const projectRoutes: Routes = [
    {
        path: 'project',
        component: ProjectComponent
    },{
        path: 'project/:id',
        component: ProjectDetailsComponent
    }
];