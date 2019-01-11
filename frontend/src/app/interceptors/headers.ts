import { Injectable } from '@angular/core';
import {
  HttpInterceptor,
  HttpHandler,
  HttpRequest,
  HttpEvent,
  HttpResponse
} from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class HeadersInterceptor implements HttpInterceptor {
  public constructor() {
    console.log('HeadersInterceptor Interceptor init...');
  }

  intercept( request: HttpRequest<any>, next: HttpHandler ): Observable<HttpEvent<any>> {
    request = request.clone({
      setHeaders: {
        'Access-Control-Allow-Origin': '*',
        'X-Custom-Header': 'Agent-007',
        'Content-type': 'application/json;charset=utf-8'
      }
    });
    console.log(request);
    return next.handle(request);
  }
}
