export class Todo {

  _id: number;
  title: string;
  desc: string;
  date: string;
  status: boolean;
  userId: number;

  constructor(obj?: Todo) {
    if (!obj) {
      this._id = null;
      this.title = "";
      this.desc = "";
      this.date = "";
      this.status = false;
      this.userId= null;
    } else {
      this._id = obj._id;
      this.title = obj.title;
      this.desc = obj.desc;
      this.date = obj.date;
      this.status = obj.status;
      this.userId = obj.userId;
    }
  }
