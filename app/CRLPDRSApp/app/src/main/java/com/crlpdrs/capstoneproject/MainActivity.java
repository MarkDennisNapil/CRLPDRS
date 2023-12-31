package com.crlpdrs.capstoneproject;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.*;
import androidx.appcompat.widget.Toolbar;
import androidx.coordinatorlayout.widget.CoordinatorLayout;
import com.google.android.material.appbar.AppBarLayout;
import android.app.*;
import android.os.*;
import android.view.*;
import android.view.View.*;
import android.widget.*;
import android.content.*;
import android.content.res.*;
import android.graphics.*;
import android.graphics.drawable.*;
import android.media.*;
import android.net.*;
import android.text.*;
import android.text.style.*;
import android.util.*;
import android.webkit.*;
import android.animation.*;
import android.view.animation.*;
import java.util.*;
import java.util.regex.*;
import java.text.*;
import org.json.*;
import java.util.HashMap;
import android.widget.ScrollView;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Button;
import android.widget.EditText;
import android.content.Intent;
import android.net.Uri;
import android.view.View;
import com.google.android.gms.*;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.DialogFragment;


public class MainActivity extends  AppCompatActivity  { 
	
	
	private Toolbar _toolbar;
	private AppBarLayout _app_bar;
	private CoordinatorLayout _coordinator;
	private HashMap<String, Object> lmap = new HashMap<>();
	
	private ScrollView vscroll1;
	private LinearLayout linear1;
	private TextView textview1;
	private TextView textview2;
	private LinearLayout linear2;
	private LinearLayout linear3;
	private Button btnlogin;
	private TextView tvservicesforall;
	private EditText etemail;
	private EditText etpassword;
	
	private RequestNetwork login;
	private RequestNetwork.RequestListener _login_request_listener;
	private Intent myvintent = new Intent();
	private Intent home = new Intent();
	private Intent servicesforall = new Intent();
	private Intent send = new Intent();
	@Override
	protected void onCreate(Bundle _savedInstanceState) {
		super.onCreate(_savedInstanceState);
		setContentView(R.layout.main);
		initialize(_savedInstanceState);
		initializeLogic();
	}
	
	private void initialize(Bundle _savedInstanceState) {
		
		_app_bar = (AppBarLayout) findViewById(R.id._app_bar);
		_coordinator = (CoordinatorLayout) findViewById(R.id._coordinator);
		_toolbar = (Toolbar) findViewById(R.id._toolbar);
		setSupportActionBar(_toolbar);
		getSupportActionBar().setDisplayHomeAsUpEnabled(true);
		getSupportActionBar().setHomeButtonEnabled(true);
		_toolbar.setNavigationOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _v) {
				onBackPressed();
			}
		});
		vscroll1 = (ScrollView) findViewById(R.id.vscroll1);
		linear1 = (LinearLayout) findViewById(R.id.linear1);
		textview1 = (TextView) findViewById(R.id.textview1);
		textview2 = (TextView) findViewById(R.id.textview2);
		linear2 = (LinearLayout) findViewById(R.id.linear2);
		linear3 = (LinearLayout) findViewById(R.id.linear3);
		btnlogin = (Button) findViewById(R.id.btnlogin);
		tvservicesforall = (TextView) findViewById(R.id.tvservicesforall);
		etemail = (EditText) findViewById(R.id.etemail);
		etpassword = (EditText) findViewById(R.id.etpassword);
		login = new RequestNetwork(this);
		
		btnlogin.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				lmap = new HashMap<>();
				lmap.put("email", etemail.getText().toString());
				lmap.put("password", etpassword.getText().toString());
				login.setParams(lmap, RequestNetworkController.REQUEST_PARAM);
				login.startRequestNetwork(RequestNetworkController.GET, "https://crlpdrscapstoneproject.000webhostapp.com/userlogin.php", "l", _login_request_listener);
			}
		});
		
		tvservicesforall.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View _view) {
				servicesforall.setClass(getApplicationContext(), ServicesforallActivity.class);
				startActivity(servicesforall);
			}
		});
		
		_login_request_listener = new RequestNetwork.RequestListener() {
			@Override
			public void onResponse(String _param1, String _param2, HashMap<String, Object> _param3) {
				final String _tag = _param1;
				final String _response = _param2;
				final HashMap<String, Object> _responseHeaders = _param3;
				if (_response.equals("{\"response:\"failed\"}")) {
					SketchwareUtil.showMessage(getApplicationContext(), "User not found!");
				}
				else {
					SketchwareUtil.showMessage(getApplicationContext(), "Welcome to Car Registered License Plate Detection & Recognition System ".concat(etemail.getText().toString()));
					home.setClass(getApplicationContext(), MenuActivity.class);
					startActivity(home);
				}
			}
			
			@Override
			public void onErrorResponse(String _param1, String _param2) {
				final String _tag = _param1;
				final String _message = _param2;
				
			}
		};
	}
	
	private void initializeLogic() {
	}
	
	@Override
	protected void onActivityResult(int _requestCode, int _resultCode, Intent _data) {
		
		super.onActivityResult(_requestCode, _resultCode, _data);
		
		switch (_requestCode) {
			
			default:
			break;
		}
	}
	
	@Deprecated
	public void showMessage(String _s) {
		Toast.makeText(getApplicationContext(), _s, Toast.LENGTH_SHORT).show();
	}
	
	@Deprecated
	public int getLocationX(View _v) {
		int _location[] = new int[2];
		_v.getLocationInWindow(_location);
		return _location[0];
	}
	
	@Deprecated
	public int getLocationY(View _v) {
		int _location[] = new int[2];
		_v.getLocationInWindow(_location);
		return _location[1];
	}
	
	@Deprecated
	public int getRandom(int _min, int _max) {
		Random random = new Random();
		return random.nextInt(_max - _min + 1) + _min;
	}
	
	@Deprecated
	public ArrayList<Double> getCheckedItemPositionsToArray(ListView _list) {
		ArrayList<Double> _result = new ArrayList<Double>();
		SparseBooleanArray _arr = _list.getCheckedItemPositions();
		for (int _iIdx = 0; _iIdx < _arr.size(); _iIdx++) {
			if (_arr.valueAt(_iIdx))
			_result.add((double)_arr.keyAt(_iIdx));
		}
		return _result;
	}
	
	@Deprecated
	public float getDip(int _input){
		return TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, _input, getResources().getDisplayMetrics());
	}
	
	@Deprecated
	public int getDisplayWidthPixels(){
		return getResources().getDisplayMetrics().widthPixels;
	}
	
	@Deprecated
	public int getDisplayHeightPixels(){
		return getResources().getDisplayMetrics().heightPixels;
	}
	
}