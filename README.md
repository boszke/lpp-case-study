###### Case Study summary

- In the readme.txt file it was written that the php version is 5.3 or higher, so for backward compatibility I decided to write with PHP5 syntax.
- I created a URL validator which I used in the URL value object. The validation is performed when creating the object, which makes it impossible to create an incorrect instance of the Url class, and thus the Item entity.
- In BrandServiceInterface I found text:
`Please write in the case study's summary if you find this approach correct or not. In both cases explain why.`
In my opinion this is not correct. It may cause application errors and is against SOLID principles (Single Responsibility).
