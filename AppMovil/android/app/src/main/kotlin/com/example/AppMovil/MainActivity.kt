package com.example.AppMovil

import androidx.annotation.NonNull
import io.flutter.embedding.android.FlutterActivity
import io.flutter.embedding.engine.FlutterEngine
import io.flutter.plugin.common.MethodChannel
import android.content.Context
import android.content.ContextWrapper
import android.content.Intent
import android.content.IntentFilter
import android.os.Build.VERSION
import android.os.Build.VERSION_CODES
import android.app.NotificationManager;
import android.app.NotificationChannel;
import android.net.Uri;
import android.media.AudioAttributes;
import android.content.ContentResolver;

class MainActivity: FlutterActivity() {
    private val CHANNEL = "notipush.com/notification_channel"

    override fun configureFlutterEngine(@NonNull flutterEngine: FlutterEngine) {
        super.configureFlutterEngine(flutterEngine)
        MethodChannel(flutterEngine.dartExecutor.binaryMessenger, CHANNEL).setMethodCallHandler {
            call, result ->

            if(call.method == "createNotificationChannel") {
                val argData = call.arguments as java.util.HashMap<String, String>
                    val completed = createNotificationChannel(argData)
                    if(completed == true) {
                        result.success(completed)
                    } else {
                        result.error("Error Code", "Error Message", null)
                    }
            } else {
                result.notImplemented()
            }
        }
    }

    private fun createNotificationChannel(mapData: HashMap<String, String>): Boolean {
        val completed: Boolean
        if(VERSION.SDK_INT >= VERSION_CODES.O) {
            val id = mapData["id"]
            val name = mapData["name"]
            val descriptionText = mapData["description"]
            //val sound = "your_sweet_sound"
            val importance = NotificationManager.IMPORTANCE_HIGH
            val mChannel = NotificationChannel(id, name, importance)
            mChannel.description = descriptionText

            /*val soundUri = Uri.parse(ContentResolver.SCHEME_ANDROID_RESOURCE + "://"+ getApplicationConttext().getPackageName() + "/raw/your_sweet_sound");
            val att = AudioAttributes.Builder()
                .setUsage(AudioAttributes.USAGE_NOTIFICATION)
                .setContentType(AudioAttributes.CONTENT_TYPE_SPEECH)
                .build()
            
            mChannel.setSound(soundUri, att)*/

            val notificationManager = getSystemService(NOTIFICATION_SERVICE) as NotificationManager
            notificationManager.createNotificationChannel(mChannel)
            completed = true
        } else {
            completed = false
        }

        return completed
    }
}
