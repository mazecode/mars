import { Injectable } from '@angular/core';
import { NGXLogger } from 'ngx-logger';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  users: any[] = [];

  constructor(private logger: NGXLogger) {
    this.logger.debug('User Service init...');
  }

  // all() {
  // return this.service.http.get('`${this.service.ENDPOINT}/users`', this.service.HTTPOPTIONS);
  // }

  // get(id: number): Observable<IResponse> {
  // return this.service.http.get<IResponse>('`${this.service.ENDPOINT}/users/${id}`', this.service.HTTPOPTIONS);
  // }
}
