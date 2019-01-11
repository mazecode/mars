import { Injectable } from '@angular/core';

import { Location } from '@angular/common';
import {
  HttpInterceptor,
  HttpRequest,
  HttpHandler,
  HttpEvent
} from '@angular/common/http';

// import { MsalService } from '../services/msal.service';
import { HttpHeaders } from '@angular/common/http';
import 'rxjs/add/observable/fromPromise';

import { JwtService } from '../services/jwt/jwt.service';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class CustomHttpInterceptor implements HttpInterceptor {
  public constructor(private jwt: JwtService) {
    console.log('CustomHttpInterceptor Interceptor init...');
  }

  intercept( request: HttpRequest<any>, next: HttpHandler ): Observable<HttpEvent<any>> {
    const token = this.jwt.getToken();
    let changedRequest = request;
    // HttpHeader object immutable - copy values
    const headerSettings: { [name: string]: string | string[] } = {};

    for (const key of request.headers.keys()) {
      headerSettings[key] = request.headers.getAll(key);
    }

    if (token) {
      headerSettings['Authorization'] = 'Bearer ' + token;
    }

    headerSettings['Content-Type'] = 'application/json';

    const newHeader = new HttpHeaders(headerSettings);

    changedRequest = request.clone({
      headers: newHeader
    });

    return next.handle(changedRequest);
  }
}
