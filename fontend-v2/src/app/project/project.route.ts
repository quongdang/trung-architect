import { Routes } from '@angular/router';
import { ProjectComponent } from  './project.component';
import { ProjectCategoryComponent } from  './project-category.component';
import { ProjectDetailsComponent } from  './project-details.component';

export const projectRoutes: Routes = [
    {
        path: 'project',
        component: ProjectComponent
    },{
        path: 'project/category/:id',
        component: ProjectCategoryComponent
    },{
        path: 'project/:id',
        component: ProjectDetailsComponent
    }
];