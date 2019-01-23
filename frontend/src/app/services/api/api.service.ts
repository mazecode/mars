import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { environment } from '../../../environments/environment';

import { JwtService } from '../jwt/jwt.service';
import { IRequestOptions } from 'src/app/Interfaces/IRequestOptions';
import { IResponse } from 'src/app/Interfaces/IResponse';

// Interfaz

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  constructor(private http: HttpClient) {}

  public async Get(path: string, options?: IRequestOptions) {
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
      .toPromise();
  }

  public async Delete(path: string, options?: IRequestOptions) {
    return await this.http
      .delete<IResponse>(`${environment.api.endpoint}${path}`, options)
      .toPromise();
  }
}
