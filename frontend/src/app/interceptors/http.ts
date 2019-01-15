import { Injectable } from '@angular/core';
import {
  HttpInterceptor,
  HttpRequest,
  HttpHandler,
  HttpEvent
} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class CustomHttpInterceptor implements HttpInterceptor {
  constructor() {}

  intercept( request: HttpRequest<any>, next: HttpHandler ): Observable<HttpEvent<any>> {
    if (!request.headers.has('Content-Type')) {
      request = request.clone({
        headers: request.headers.set(
          'Content-Type',
          'application/json;charset=utf-8'
        )
      });
    }

    request = request.clone({
      headers: request.headers.set('Accept', 'application/json')
    });

    return next.handle(request);
  }
}
