import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Contact } from '../interfaces/contact';

@Injectable({
  providedIn: 'root'
})
export class ContactService {
  baseUrl : string = 'http://localhost:8000/api/contacts';

  constructor(private http : HttpClient) { }

  getAll(){
    return this.http.get(this.baseUrl);
  }

  create(body : Contact){
    return this.http.post(this.baseUrl,body);
  }
}
