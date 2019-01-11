export interface IResponse {
  data: any;
  messages: Array<string>;
  error: boolean;
  code: number;
  status: string;
}
