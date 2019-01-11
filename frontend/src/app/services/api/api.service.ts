import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { environment } from '../../../environments/environment';

import { JwtService } from '../jwt/jwt.service';

// Interfaz
import { IResponse } from '../../interfaces/IResponse';
import { IRequestOptions } from 'src/app/interfaces/IRequestOptions';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  private jwt: JwtService;

  constructor(private http: HttpClient) {
    console.log('API Service init...');
  }

  private formatErrors(error: any) {
    return throwError(error.error);
  }

  public Get(path: string, options?: IRequestOptions): Observable<IResponse> {
    // const token = this.jwt.getToken();
    // if (token) {
    //   options.headers = options.headers.set('Authentication', token);
    // }
    console.log(path);
    return this.http
      .get<IResponse>(`${environment.api.endpoint}${path}`, options);
      // .pipe(catchError(this.formatErrors));
  }

  public Put( path: string, params: Object = {}, options?: IRequestOptions ): Observable<IResponse> {
    return this.http
      .put<IResponse>(`${environment.api.endpoint}${path}`, JSON.stringify(params), options)
      .pipe(catchError(this.formatErrors));
  }

  public Post( path: string, params: Object = {}, options?: IRequestOptions ): Observable<IResponse> {
    return this.http
      .post<IResponse>(`${environment.api.endpoint}${path}`, JSON.stringify(params), options)
      .pipe(catchError(this.formatErrors));
  }

  public Delete( path: string, options?: IRequestOptions ): Observable<IResponse> {
    return this.http
      .delete<IResponse>(`${environment.api.endpoint}${path}`, options)
      .pipe(catchError(this.formatErrors));
  }
}
