import { Injectable } from '@angular/core';

import { Location } from '@angular/common';
import { Observable } from; 'rxjs';
import { HttpInterceptor, HttpRequest, HttpHandler, HttpEvent  } from '@angular/common/http';

// import { MsalService } from '../services/msal.service';
import { HttpHeaders } from '@angular/common/http';
import 'rxjs/add/observable/fromPromise';

@Injectable()
export class CustomHttpInterceptor implements HttpInterceptor {
    constructor() {}

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        return Observable.fromPromise(this.handleAccess(request, next));
    }

    private async handleAccess(request: HttpRequest<any>, next: HttpHandler): Promise<HttpEvent<any>> {
        const token = await this.msalService.getAccessToken();
        let changedRequest = request;
        // HttpHeader object immutable - copy values
        const headerSettings: {[name: string]: string | string[]; } = {};

        for (const key of request.headers.keys()) {
            headerSettings[key] = request.headers.getAll(key);
        }
        if (token) {
            headerSettings['Authorization'] = 'Bearer ' + token;
        }
        headerSettings['Content-Type'] = 'application/json';
        const newHeader = new HttpHeaders(headerSettings);

        changedRequest = request.clone({
            headers: newHeader});
        return next.handle(changedRequest).toPromise();
    }

}
