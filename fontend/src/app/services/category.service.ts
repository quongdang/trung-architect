import {Injectable} from '@angular/core';
import {Http, Response} from '@angular/http';
import {Observable} from 'rxjs/Rx';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';
import {Project} from '../dataModel/project.model';
import {environment} from '../../environments/environment';

@Injectable()
export class CategoryService {
  baseURL = environment.baseURL;
  constructor(private http: Http) {
  }
  
  getAllData(req?: any): Observable<ResponseWrapper> {    
      return this.http.get(this.baseURL + '/api/category/read.php').map(
        (res: Response) => this.convertResponse(res)
      );
  }

  private convertResponse(res: Response): ResponseWrapper {
    const jsonResponse = res.json();
    return new ResponseWrapper(res.headers, jsonResponse, res.status);
  }
}
