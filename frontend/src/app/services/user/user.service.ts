import { Injectable } from '@angular/core';

import { NGXLogger } from 'ngx-logger';
import { ApiService } from '../api/api.service';
import { HttpClient } from '@angular/common/http';
import { JwtService } from '../jwt/jwt.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  users: any[] = [];

  constructor(private service: ApiService) {
    console.log('User Service init...');

    console.log(service);
  }

  all() {
    return this.service.Get(`/users`);
  }

  get(id: number) {
    return this.service.Get(`/users/${id}`);
  }
}
