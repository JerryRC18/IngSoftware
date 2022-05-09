#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);
    QSqlDatabase db = QSqlDatabase::addDatabase("QMYSQL");
    db.setHostName("127.0.0.1");
    db.setUserName("EduardoGC");
    db.setPassword("+BaalLordOfDestruction1");
    db.setDatabaseName("dentista");

    connected = db.open();

    if (connected) {
        QSqlQuery query;
        if (query.exec("SELECT cit_id, cit_fecha, cit_hora, cit_servicio, usu_id FROM citas JOIN usuarios ON cit_id_usu = usuarios.usu_id JOIN servicios")) {
            while (query.next()) {
                currentID = query.value(0).toInt();
                ui->id->setText(query.value(0).toString());
                ui->fecha->setText(query.value(1).toString());
                ui->hora->setText(query.value(2).toString());
                ui->serv->setText(query.value(3).toString());
                ui->id_usu->setText(query.value(4).toString());
            }
        }
        else {
            qDebug() << query.lastError().text();
        }

    }
        else {
            qDebug() << "Failed to connect to database.";
    }
}

MainWindow::~MainWindow()
{
    db.close();
    delete ui;
}


void MainWindow::on_insertButton_clicked()
{
    if (connected) {
        QString id = ui->id->text();
        QString fecha = ui->fecha->text();
        QString hora = ui->hora->text();
        QString id_usu = ui->id_usu->text();
        QString serv = ui->serv->text();
        qDebug() << "INSERT INTO citas (cit_id, cit_fecha, cit_hora, cit_id_usu, cit_servicio) VALUES (" + id + ",'"  + fecha + "', '" + hora +"','" + id_usu + "','" + serv + "')";
        QSqlQuery query;
        if (query.exec("INSERT INTO citas (cit_id, cit_fecha, cit_hora, cit_id_usu, cit_servicio) VALUES (" + id + ",'"  + fecha + "', '" + hora +"','" + id_usu + "','" + serv + "')")) {
            currentID = query.lastInsertId().toInt();
            qDebug() << "Insert success.";
        } else {
            qDebug() << query.lastError().text();
        }
        } else {
            qDebug() << "Failed to connect to database.";
        }
}

void MainWindow::on_updatButton_clicked()
{
    if (connected) {
        if (currentID == 0) {
            qDebug() << "Nothing to update.";
        }
        else {
            QString id = QString::number(currentID);
            QString _id = ui->id->text();
            QString fecha = ui->fecha->text();
            QString hora = ui->hora->text();
            QString id_usu = ui->id_usu->text();
            QString serv = ui->serv->text();
            qDebug() << "UPDATE citas SET cit_fecha = '" + fecha + "', cit_hora = '" + hora + "', cit_id_usu = '" + id_usu + "', cit_servicio = '" + serv + "' WHERE cit_id = " + _id;
            QSqlQuery query;
            if (query.exec("UPDATE citas SET cit_fecha = '" + fecha + "', cit_hora = '" + hora + "', cit_id_usu = '" + id_usu + "', cit_servicio = '" + serv + "' WHERE cit_id = " + _id)) {
               qDebug() << "Update success.";
            }
            else {
                qDebug() << query.lastError().text();
            }
            }
            } else {
            qDebug() << "Failed to connect to database.";
            }
        }


void MainWindow::on_deleteButton_clicked()
{
    if (connected) {
        if (currentID == 0) {
            qDebug() << "Nothing to delete.";
    }
    else {
        QString id = QString::number(currentID);
        QString _id = ui->id->text();
        qDebug() << "DELETE FROM citas WHERE cit_id = " + _id;
        QSqlQuery query;
        if (query.exec("DELETE FROM citas WHERE cit_id = " + _id)) {
            currentID = 0;
            qDebug() << "Delete success.";
        }
        else {
            qDebug() << query.lastError().text();
        }
    }
    }
    else {
        qDebug() << "Failed to connect to database.";
    }
}
