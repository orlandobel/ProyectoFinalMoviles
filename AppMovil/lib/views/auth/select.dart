import 'package:flutter/material.dart';

class SelectInput extends StatefulWidget {
  final Map<String, num> _opciones;
  num dropdownValue;
  //num dropdownValue;

  SelectInput(this._opciones, {this.dropdownValue = 0, Key key})
      : super(key: key);

  @override
  _SelectInputState createState() => _SelectInputState(_opciones);
}

class _SelectInputState extends State<SelectInput> {
  final Map<String, num> _opciones;

  _SelectInputState(this._opciones);

  initState() {
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    final num _width = MediaQuery.of(context).size.width;

    return Padding(
      padding: const EdgeInsets.only(bottom: 25),
      child: SizedBox(
        width: _width,
        child: ButtonTheme(
          alignedDropdown: true,
          child: DropdownButton<num>(
            value: widget.dropdownValue,
            icon: Icon(Icons.arrow_downward_rounded),
            iconSize: 20,
            elevation: 16,
            style: TextStyle(
              color: Colors.black54,
              fontSize: 16,
            ),
            underline: Container(
              height: 1,
              width: 600,
              color: Colors.black54,
            ),
            onChanged: (num newValue) {
              setState(() {
                widget.dropdownValue = newValue;
              });
            },
            items: _opciones
                .map(
                  (description, value) {
                    return MapEntry(
                      description,
                      DropdownMenuItem<num>(
                        value: value,
                        child: Container(
                          width: _width - 100,
                          child: Text(
                            description,
                            textAlign: TextAlign.center,
                          ),
                        ),
                      ),
                    );
                  },
                )
                .values
                .toList(),
          ),
        ),
      ),
    );
  }
}
