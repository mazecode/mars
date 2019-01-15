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
  providedIn: 'root'
})
export class ApiService {
  constructor(private http: HttpClient) {}

  private formatErrors(error: any) {
    return throwError(error.error);
  }

  public async Get(path: string, options?: IRequestOptions) {
    return this.http
      .get<IResponse>(`${environment.api.endpoint}${path}`, options)
      .pipe(catchError(this.formatErrors))
      .toPromise();
  }

  public async Get2(path: string, options?: IRequestOptions) {
    return await this.http
      .get<IResponse>(`${environment.api.endpoint}${path}`, options)
      .toPromise();
  }

  public async Put(
    path: string,
    params: Object = {},
    options?: IRequestOptions
  ) {
    return await this.http
      .put<IResponse>(
        `${environment.api.endpoint}${path}`,
        JSON.stringify(params),
        options
      )
      .pipe(catchError(this.formatErrors))
      .toPromise();
  }

  public async Post(
    path: string,
    params: Object = {},
    options?: IRequestOptions
  ) {
    return await this.http
      .post<IResponse>(
        `${environment.api.endpoint}${path}`,
        JSON.stringify(params),
        options
      )
      .pipe(catchError(this.formatErrors))
      .toPromise();
  }

  public async Delete(path: string, options?: IRequestOptions) {
    return await this.http
      .delete<IResponse>(`${environment.api.endpoint}${path}`, options)
      .pipe(catchError(this.formatErrors))
      .toPromise();
  }
}
