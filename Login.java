package tp3;
import java.awt.*;
import javax.swing.*;
import java.awt.event.*;

public class Login extends JFrame implements ActionListener{
	
	Login() {
		getContentPane().setBackground(Color.WHITE);
		setLayout(null);
		
		Icon img = new ImageIcon("C:\\Users\\HP\\OneDrive\\Images\\Saved Pictures\\quiz time.jpg");
		JLabel image = new JLabel(img);
		image.setBounds(0, 0, 500, 500);
		add(image);
		
		JLabel head = new JLabel("Kiddy Quiz");
		head.setBounds(750, 60, 300, 45);
		head.setFont(new Font("Kristen ITC", Font.BOLD, 40));
		head.setForeground(Color.BLACK);
		add(head);
		
		JLabel name = new JLabel("Enter Your Name");
		name.setBounds(787, 160, 300, 20);
		name.setFont(new Font("", Font.BOLD, 20));
		name.setForeground(Color.blue);
		add(name);
		
		JTextField tfname = new JTextField();
		tfname.setBounds(718, 220, 300, 25);
		tfname.setFont(new Font("Times New Roman", Font.BOLD, 20));
		add(tfname);
		
		JButton rules = new JButton("Rules");
		rules.setBounds(718, 290, 120, 25);
		rules.setBackground(Color.GREEN);
		rules.setForeground(Color.BLACK);
		add(rules);
		
		JButton exit = new JButton("Exit");
		exit.setBounds(918, 290, 100, 25);
		exit.setBackground(Color.RED);
		exit.setForeground(Color.BLACK);
		add(exit);
		
		setSize(1200, 500);
		setLocation(40, 100);
		setVisible(true);
	}
	
	public void actionPerformed(ActionEvent ae) {
		
	}
	
	public static void main(String[] args) {
		new Login();
	}
}
