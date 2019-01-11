import { Injectable } from '@angular/core';
import {
  HttpEvent,
  HttpHandler,
  HttpInterceptor,
  HttpRequest
} from '@angular/common/http';
import { Observable } from 'rxjs';
import { JwtService } from '../services/jwt/jwt.service';

@Injectable()
export class AuthInterceptor implements HttpInterceptor {
  public constructor(private jwt: JwtService) {
    console.log('Auth Interceptor init...');
  }

  public intercept( req: HttpRequest<any>, next: HttpHandler ): Observable<HttpEvent<any>> {
    let clonedRequest: HttpRequest<any>;
    const token = this.jwt.getToken();
    if (token) {
      clonedRequest = req.clone({
        headers: req.headers.set('Authentication', token)
      });
    }

    return next.handle(clonedRequest);
  }
}
