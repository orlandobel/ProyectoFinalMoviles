import 'package:flutter/material.dart';
import 'drawer.dart';


class LoginPage extends StatelessWidget {

  Widget create_infoImput(){
    return  TextFormField(
              textAlign: TextAlign.center,
              decoration: InputDecoration(hintText: 'Ingrese su info'),
              obscureText: true,
            );
  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Container(
        padding: EdgeInsets.symmetric(horizontal: 20),
        decoration: BoxDecoration(color: Colors.white),
        child: ListView(
          children: [
            Image.asset('assets/images/login_logo.png',
            width: 200,
            ),

            MyStatefulWidget(),

            create_infoImput(),

            Container(   //Boton continuar
            padding: const EdgeInsets.only(top: 50),
            child: RaisedButton(
            child: Text(
            'Continuar',
            style: TextStyle(
              fontWeight: FontWeight.bold,
              fontSize: 18 
              ),
            ),
            textColor: Colors.white,
            color: Colors.blue,
            onPressed: () {   
              Navigator.push(context, new MaterialPageRoute(
              builder: (context) => DrawerMenu(title:  '')
              ));
            },
          )
          )

          ]
        ),
      ),
    );
  }
}

class MyStatefulWidget extends StatefulWidget {
  MyStatefulWidget({Key key}) : super(key: key);

  @override
  _MyStatefulWidgetState createState() => _MyStatefulWidgetState();
}

class _MyStatefulWidgetState extends State<MyStatefulWidget> {
  String dropdownValue = 'Seleccione';

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.only(bottom: 25),
      child: DropdownButton<String>(
        value: dropdownValue,
        icon: Icon(Icons.arrow_downward_rounded),
        iconSize: 20,
        elevation: 16,
        style: TextStyle(
          color: Colors.black54,
          fontSize: 16
          ),
        underline: Container(
          height: 1,
          width: 600,
          color: Colors.black54,
        ),
        onChanged: (String newValue) {
          setState(() {
            dropdownValue = newValue;
          });
        },
        items: <String>['Seleccione', 'Docente', 'Alumno', 'Becas']
            .map<DropdownMenuItem<String>>((String value) {
          return DropdownMenuItem<String>(
            value: value,
            child: SizedBox(
              width: 300,
              child: Text(value, textAlign: TextAlign.center,)),
          );
        }).toList(),
      ),
    );
  }
}