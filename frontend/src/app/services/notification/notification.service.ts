import { Injectable } from '@angular/core';
import { Router, NavigationStart } from '@angular/router';

import { Observable } from 'rxjs';
import { Subject } from 'rxjs/Subject';

import 'rxjs/add/operator/filter';

import { Notify, NotifyType } from '../../interfaces/Notify';

@Injectable({
  providedIn: 'root'
})
export class NotificationService {
  private subject = new Subject<Notify>();
  private keepAfterRouteChange = false;

  constructor(private router: Router) {
    console.log('Notify INIT....');
    // clear alert messages on route change unless 'keepAfterRouteChange' flag is true
    router.events.subscribe(event => {
      if (event instanceof NavigationStart) {
        if (this.keepAfterRouteChange) {
          // only keep for a single route change
          this.keepAfterRouteChange = false;
        } else {
          // clear alert messages
          this.clear();
        }
      }
    });
  }

  // subscribe to alerts
  getAlert(alertId?: string): Observable<any> {
    return this.subject
      .asObservable()
      .filter((x: Notify) => x && x.alertId === alertId);
  }

  // convenience methods
  success(message: string) {
    this.alert(new Notify({ message, type: NotifyType.Success }));
  }

  error(message: string) {
    this.alert(new Notify({ message, type: NotifyType.Error }));
  }

  info(message: string) {
    this.alert(new Notify({ message, type: NotifyType.Info }));
  }

  warn(message: string) {
    this.alert(new Notify({ message, type: NotifyType.Warning }));
  }

  // main alert method
  alert(alert: Notify) {
    this.keepAfterRouteChange = alert.keepAfterRouteChange;
    this.subject.next(alert);
  }

  // clear alerts
  clear(alertId?: string) {
    this.subject.next(new Notify({ alertId }));
  }
}
