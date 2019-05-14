import {Injectable} from '@angular/core';
import {Http, Response} from '@angular/http';
import {Observable} from 'rxjs/Rx';
import {ResponseWrapper} from '../dataModel/responseWrapper.model';
import {environment} from '../../environments/environment';

@Injectable()
export class GrowWithUsService {
  baseURL = environment.baseURL;
  constructor(private http: Http) {
  }
  
  getLast(req?: any): Observable<ResponseWrapper> {    
      return this.http.get(this.baseURL + '/api/growWithUs/read_last.php').map(
        (res: Response) => this.convertResponse(res)
      );
  }
  
  getOne(req?: any): Observable<ResponseWrapper> {    
      return this.http.get(this.baseURL + '/api/growWithUs/read_one.php?id=' + req).map(
        (res: Response) => this.convertResponse(res)
      );
  }
  
  getAllData(req?: any): Observable<ResponseWrapper> {    
      return this.http.get(this.baseURL + '/api/growWithUs/read.php').map(
        (res: Response) => this.convertResponse(res)
      );
  }

  private convertResponse(res: Response): ResponseWrapper {
    const jsonResponse = res.json();
    return new ResponseWrapper(res.headers, jsonResponse, res.status);
  }
}
