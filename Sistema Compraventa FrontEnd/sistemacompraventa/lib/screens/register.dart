import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:http/http.dart' as http;
import 'shop.dart';

class Register extends StatefulWidget {
  const Register({super.key});

  @override
  RegisterState createState() => RegisterState();
}

class RegisterState extends State<Register> {
  String selectedOption = "personal"; 

  final TextEditingController nameUserController = TextEditingController();
  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();

  // URL base de la API de Laravel
  final String baseUrl = 'http://127.0.0.1:8000/api';

  Future<void> registerUser(String email, String password, String user) async {
  final String url = '$baseUrl/register';

  final response = await http.post(
    Uri.parse(url),
    headers: {'Content-Type': 'application/json'},
    body: json.encode({
      'name_usuario': user,
      'email_usuario': email,
      'contrasena_usuario': password,
    }),
  );

  if (response.statusCode == 200) {
    final Map<String, dynamic> data = json.decode(response.body);
    print('Registre exitoso: ${data['token']}');

    // Navegar a ShopScreen después de iniciar sesión
    Navigator.pushReplacement(
      context,
      MaterialPageRoute(builder: (context) => ShopScreen()),
    );
  } else {
    final Map<String, dynamic> errorData = json.decode(response.body);
    print('Error en registrar: ${errorData['message']}');
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(content: Text('Error de registro: ${errorData['message']}')),
    );
  }
}

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        backgroundColor: const Color(0xFFB68929),
      ),
      body: SingleChildScrollView(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 30, vertical: 20),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                const Text(
                  "Crear una cuenta",
                  style: TextStyle(fontSize: 28, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 10),
                const Text(
                  "Selecciona el tipo de registro",
                  style: TextStyle(fontSize: 16, color: Colors.grey),
                ),
                const SizedBox(height: 30),

                // Opciones de Registro
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    _buildRegisterOption(
                      icon: Icons.person,
                      title: "Personal",
                      description: "Regístrate como usuario individual",
                      option: "personal",
                    ),
                    const SizedBox(width: 20),
                    _buildRegisterOption(
                      icon: Icons.business,
                      title: "Comercial",
                      description: "Regístrate como empresa o negocio",
                      option: "comercial",
                    ),
                  ],
                ),
                const SizedBox(height: 10),
                _buildRegisterForm(),
                const SizedBox(height: 10),

                // Texto "o continúa con"
                const Text(
                  "o continúa con",
                  style: TextStyle(fontSize: 16, color: Color(0xFFB68929)),
                  textAlign: TextAlign.center,
                ),
                const SizedBox(height: 10),

                // Botones de inicio de sesión con redes sociales
                _buildSocialButton("Google", "assets/images/google.png"),
                const SizedBox(height: 10),
                _buildSocialButton("Facebook", FontAwesomeIcons.facebook, color: Colors.blue),
                const SizedBox(height: 10),
                _buildSocialButton("Apple", FontAwesomeIcons.apple),

                const SizedBox(height: 10),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Text("¿Ya tienes una cuenta?"),
                    TextButton(
                      onPressed: () => Navigator.pop(context),
                      child: const Text("Inicia sesión", style: TextStyle(color: Color(0xFFB68929))),
                    ),
                  ],
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }

  // Widget para mostrar las opciones de registro
  Widget _buildRegisterOption({
    required IconData icon,
    required String title,
    required String description,
    required String option,
  }) {
    return Expanded(
      child: GestureDetector(
        onTap: () => setState(() => selectedOption = option),
        child: Card(
          elevation: 4,
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
          color: selectedOption == option ? const Color(0xFFB68929) : Colors.white,
          child: Padding(
            padding: const EdgeInsets.all(20),
            child: Column(
              children: [
                Icon(icon, size: 50, color: selectedOption == option ? Colors.white : const Color(0xFFB68929)),
                const SizedBox(height: 10),
                Text(title, style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold, color: selectedOption == option ? Colors.white : Colors.black)),
                const SizedBox(height: 5),
                Text(description, textAlign: TextAlign.center, style: TextStyle(fontSize: 14, color: selectedOption == option ? Colors.white70 : Colors.grey)),
              ],
            ),
          ),
        ),
      ),
    );
  }

  // Widget del formulario de registro
  Widget _buildRegisterForm() {
    return Column(
      children: [
        _buildTextField(label: "Nombre", icon: Icons.person),
        const SizedBox(height: 10),
        _buildTextField(label: "Email", icon: Icons.email, ),
        const SizedBox(height: 10),
        _buildTextField(label: "Contraseña", icon: Icons.lock, obscureText: true),
        const SizedBox(height: 20),
        SizedBox(
          width: 400,
          height: 50,
          child: ElevatedButton(
            style: ElevatedButton.styleFrom(
              backgroundColor: const Color(0xFFB68929),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
            ),
            onPressed: () {},
            child: Text(
              selectedOption == "personal" ? "Crear una cuenta personal" : "Crear una cuenta comercial",
              style: const TextStyle(fontSize: 18, color: Colors.white),
            ),
          ),
        ),
      ],
    );
  }

  // Widget para los botones de redes sociales
  Widget _buildSocialButton(String text, dynamic icon, {Color color = Colors.black}) {
    return SizedBox(
      width: 400,
      height: 50,
      child: ElevatedButton(
        style: ElevatedButton.styleFrom(
          side: const BorderSide(color: Colors.black),
          backgroundColor: Colors.white,
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
        ),
        onPressed: () {},
        child: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            if (icon is String)
              Image.asset(icon, width: 25, height: 25)
            else
              FaIcon(icon as IconData, size: 25, color: color),
            const SizedBox(width: 10),
            Text(text, style: const TextStyle(fontSize: 16, color: Colors.black)),
          ],
        ),
      ),
    );
  }

  // Widget genérico para TextFields
  Widget _buildTextField({required String label, required IconData icon, bool obscureText = false}) {
    return SizedBox(
      width: 400,
      child: TextField(
        obscureText: obscureText,
        decoration: InputDecoration(
          labelText: label,
          prefixIcon: Icon(icon, color: const Color(0xFFB68929)),
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(10)),
        ),
      ),
    );
  }
}
