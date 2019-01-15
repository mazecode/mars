import { Injectable } from '@angular/core';

import { NGXLogger } from 'ngx-logger';
import { ApiService } from '../api/api.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  users: any[] = [];

  constructor(private service: ApiService) {}

  public async all() {
    return await this.service.Get(`/users`);
  }

  public async get(id: number) {
    return await this.service.Get(`/users/${id}`);
  }

  public async update(id: number) {
    const data = {
      username: 'dummys',
      name: 'Dummy API',
      surnames: 'Foo loop'
    };
    return await this.service.Put(`/users/${id}`, data);
  }

  public async delete(id: number) {
    return await this.service.Delete(`/users/${id}`);
  }
}
