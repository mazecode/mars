import { Injectable } from '@angular/core';
import { ApiService } from '../api/api.service';

@Injectable({
  providedIn: 'root'
})
export class DiscountService {
  discounts: any[] = [];

  constructor(private service: ApiService) {}

  public async all() {
    return await this.service.Get(`/discount`);
  }

  public async get(id: number) {
    return await this.service.Get(`/discount/${id}`);
  }

  public async update(id: number) {
    const data = {
      username: 'dummys',
      name: 'Dummy API',
      surnames: 'Foo loop'
    };
    return await this.service.Put(`/discount/${id}`, data);
  }

  public async delete(id: number) {
    return await this.service.Delete(`/discount/${id}`);
  }
}
