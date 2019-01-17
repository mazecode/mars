import { Injectable } from '@angular/core';
import {
  HttpInterceptor,
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpErrorResponse
} from '@angular/common/http';
import 'rxjs/add/operator/do';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';

import { ErrorHandler } from '../services/error/ErrorHandler';

@Injectable()
export class CustomHttpInterceptor implements HttpInterceptor {
  constructor(public errorHandler: ErrorHandler) {}

  intercept(
    request: HttpRequest<any>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
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

    return next.handle(request)
    .pipe(
      retry(1),
      catchError((error: HttpErrorResponse) => this.errorHandler.handleError(error))
    );
  }
}
