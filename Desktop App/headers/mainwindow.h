#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <historial.h>
#include <update.h>
#include <QTableWidgetItem>
#include <QMessageBox>
#include <QMainWindow>
#include <QtSql>
#include <QSqlDatabase>
#include <QSqlQuery>
#include <QDebug>

QT_BEGIN_NAMESPACE
namespace Ui { class MainWindow; }
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void changeWindow();

    void on_delete_clicked();

    void on_pushButton_clicked();

    void on_pushButton_2_clicked();

    void on_pushButton_3_clicked();

    void on_login_clicked();

private:
    Historial *historial;
    class::update *update;
    QTimer *timer;
    Ui::MainWindow *ui;
    bool hasInit;
    QSqlDatabase db;
};
#endif // MAINWINDOW_H
