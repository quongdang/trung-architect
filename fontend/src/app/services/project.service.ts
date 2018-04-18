import {Injectable} from '@angular/core';
import {Http, Response} from '@angular/http';
import {Observable} from 'rxjs/Rx';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';
import {Project} from '../dataModel/project.model';

@Injectable()
export class ProjectService {

  constructor(private http: Http) {
  }
  
  getAllProjects(req?: any): Observable<ResponseWrapper> {
      const url = 'http://localhost/trung-architect/admin/api/project/read.php';      
      return this.http.get(url).map((res: Response) => this.convertResponse(res));
  }

  private convertResponse(res: Response): ResponseWrapper {
    const jsonResponse = res.json();
    return new ResponseWrapper(res.headers, jsonResponse, res.status);
  }
}
