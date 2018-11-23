export class User {

  _id: number;
  email: string;

  constructor(obj?: User) {
    if (!obj) {
      this._id = null;
      this.email= "";
    } else {
      this._id = obj._id;
      this.email = obj.email;

    }
  }
