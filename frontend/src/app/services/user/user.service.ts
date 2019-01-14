import { Injectable } from '@angular/core';

import { NGXLogger } from 'ngx-logger';
import { ApiService } from '../api/api.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  users: any[] = [];

  constructor(private service: ApiService) {
    console.log('User Service init...');
  }

  login() {
    const data = {
      username: 'dummys',
      name: 'Dummy API',
      surnames: 'Foo loop'
    };
    return this.service.Post('/login', data);
  }

  all() {
    return this.service.Get(`/users`);
  }

  get(id: number) {
    return this.service.Get(`/users/${id}`);
  }

  update(id: number) {
    const data = {
      username: 'dummys',
      name: 'Dummy API',
      surnames: 'Foo loop'
    };
    return this.service.Put(`/users/${id}`, data);
  }

  delete(id: number) {
    return this.service.Delete(`/users/${id}`);
  }
}
