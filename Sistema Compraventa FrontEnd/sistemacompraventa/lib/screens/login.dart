import 'dart:convert'; // Para la codificación JSON
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'shop.dart';
import 'register.dart';

class Login extends StatefulWidget {
  const Login({super.key});

  @override
  _LoginState createState() => _LoginState();
}

class _LoginState extends State<Login> {
  final TextEditingController usuarioController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  // URL base de la API de Laravel
  final String baseUrl = 'http://127.0.0.1:8000/api';

  Future<void> loginUser(String user, String password) async {
  final String url = '$baseUrl/login';

  final response = await http.post(
    Uri.parse(url),
    headers: {
      'Accept' : 'application/json',
      'Content-Type': 'application/json'},
    body: json.encode({
      'name_usuario': user,
      'contrasena_usuario': password,
    }),
  );



  if (response.statusCode == 200) {

    final Map<String, dynamic> data = json.decode(response.body);
    print('Login exitoso: ${data['token']}');

    // Navegar a ShopScreen después de iniciar sesión
    Navigator.pushReplacement(
      context,
      MaterialPageRoute(builder: (context) => ShopScreen()),
    );
  } else {
    final Map<String, dynamic> errorData = json.decode(response.body);

    print('Error en login: ${errorData['message']}');
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(content: Text('Error de login: ${errorData['message']}')),
    );
  }
}

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color.fromARGB(255, 255, 255, 255),
      appBar: AppBar(
        backgroundColor: const Color(0xFFB68929),
        actions: [
          Padding(
            padding: const EdgeInsets.only(right: 20),
            child: TextButton(
              onPressed: () {
                // Navegar a pantalla de recuperación de contraseña
              },
              child: const Text(
                "¿Olvidaste tu contraseña?",
                style: TextStyle(color: Colors.white),
              ),
            ),
          ),
        ],
        bottom: PreferredSize(
          preferredSize: const Size.fromHeight(4.0),
          child: Container(
            color: Colors.white,
            height: 4.0,
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 30),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                const SizedBox(height: 30),
                const Text(
                  "Bienvenido",
                  style: TextStyle(
                    fontSize: 28,
                    fontWeight: FontWeight.bold,
                    color: Color(0xFFB68929),
                  ),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 5),
                Center(
                  child: Image.asset(
                    'assets/images/rp_logo.png',  
                    width: 400,
                    height: 200,
                    fit: BoxFit.contain,
                  ),
                ),
                const SizedBox(height: 5),
                const Text(
                  "Inicia sesión para continuar",
                  style: TextStyle(fontSize: 16, color: Colors.grey),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 5),

                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Text("¿No tienes cuenta?"),
                    TextButton(
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(builder: (context) => const Register()),
                        );
                      },
                      child: const Text(
                        "Crear cuenta",
                        style: TextStyle(color: Color(0xFFB68929)),
                      ),
                    ),
                  ],
                ),
                const SizedBox(height: 10),

                SizedBox(
                  width: 400,
                  child: TextField(
                    controller: usuarioController,
                    decoration: InputDecoration(
                      labelText: "Usuario",
                      prefixIcon: Icon(Icons.person, color: Color(0xFFB68929)),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(10),
                        borderSide: BorderSide(color: Color(0xFFB68929)),
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 20),

                SizedBox(
                  width: 400,
                  child: TextField(
                    controller: passwordController,
                    obscureText: true,
                    decoration: InputDecoration(
                      labelText: "Contraseña",
                      prefixIcon: Icon(Icons.lock, color: Color(0xFFB68929)),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(10),
                        borderSide: BorderSide(color: Color(0xFFB68929)),
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 10),

                SizedBox(
                  width: 400,
                  height: 50,
                  child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Color(0xFFB68929),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(10),
                      ),
                    ),
                    onPressed: () {
                      String email = usuarioController.text;
                      String password = passwordController.text;

                      // Llamada a la función loginUser con los valores del formulario
                      loginUser(email, password);
                    },
                    child: const Text(
                      "Iniciar Sesión",
                      style: TextStyle(fontSize: 18, color: Colors.white),
                    ),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
