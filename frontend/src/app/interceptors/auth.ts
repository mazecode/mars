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
  public constructor(private tokenService: JwtService) {}

  public intercept(
    req: HttpRequest<any>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
    let clonedRequest: HttpRequest<any>;

    if (this.tokenService.token) {
      clonedRequest = req.clone({
        headers: req.headers.set('Authentication', this.tokenService.token)
      });
    }

    return next.handle(clonedRequest);
  }
}
