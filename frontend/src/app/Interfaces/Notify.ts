export class Notify {
  type: NotifyType;
  message: string;
  alertId: string;
  keepAfterRouteChange: boolean;

  constructor(init?: Partial<Notify>) {
    Object.assign(this, init);
  }
}

export enum NotifyType {
  Success,
  Error,
  Info,
  Warning
}
