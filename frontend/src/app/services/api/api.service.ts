import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { JwtService } from '../jwt/jwt.service';
import { HttpService } from '../http/http.service';

import { IResponse } from '../../interfaces/IResponse';
import { IRequestOptions } from 'src/app/interfaces/IRequestOptions';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  constructor(private http: HttpService, private jwtService: JwtService) {}

  private formatErrors(error: any) {
    return throwError(error.error);
  }

  get(path: string, options?: IRequestOptions): Observable<IResponse> {
    const token = this.jwtService.getToken();
    if (token) {
      options.headers = options.headers.set(
        'Authentication',
        this.jwtService.token
      );
    }
    return this.http
      .get<IResponse>(`${environment.api.endpoint}${path}`, options)
      .pipe(catchError(this.formatErrors));
  }

  put(
    path: string,
    body: Object = {},
    options?: IRequestOptions
  ): Observable<IResponse> {
    return this.http
      .put<IResponse>(
        `${environment.api.endpoint}${path}`,
        JSON.stringify(body),
        options
      )
      .pipe(catchError(this.formatErrors));
  }

  post(
    path: string,
    body: Object = {},
    options?: IRequestOptions
  ): Observable<IResponse> {
    return this.http
      .post<IResponse>(
        `${environment.api.endpoint}${path}`,
        JSON.stringify(body),
        options
      )
      .pipe(catchError(this.formatErrors));
  }

  delete(path: string, options?: IRequestOptions): Observable<IResponse> {
    return this.http
      .delete<IResponse>(`${environment.api.endpoint}${path}`, options)
      .pipe(catchError(this.formatErrors));
  }
}
